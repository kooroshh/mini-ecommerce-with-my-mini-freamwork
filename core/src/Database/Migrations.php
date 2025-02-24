<?php namespace Main\Core\Database;

use Main\Core\Application;
use PDO;

class Migrations
{
    protected Database $db;
    public function __construct(Database $database)
    {
        $this->db = $database;
    }

    public function applyMigrations()
    {
        $this->createMigrationsTable();

        $files = scandir(Application::$MAIN_ROUTE . "/database/migrations");
        $newMigration = [];
        $appliedMigrations = $this->getAppliedMigrations();
        $appliedMigrations = array_map(fn($migration) => $migration->migration,$appliedMigrations);
        $migrations = array_diff($files, $appliedMigrations);

        foreach($migrations as $migration)
        {
            if($migration == "." || $migration == "..")
                continue;

            $migrationInstance = require_once Application::$MAIN_ROUTE . "/database/migrations/$migration";

            $this->log("applying Migration");
            $migrationInstance->up();
            $this->log("applied");
            $newMigration[] = $migration;

            
        }

        if(!empty($newMigration))
        {
            $this->saveMigration($newMigration);
        }else
        {
            $this->log("There are not any migration file");
        }

    }

    public function rollbackMigrations()
    {

        $appliedMigrations = $this->getAppliedMigrations();
        $lastBatch = $this->getLastBatchNumber();

        $lastMigration = array_filter($appliedMigrations, fn($migration) => $migration->batch == $lastBatch);

        foreach($lastMigration as $migration)
        {
            $migrationInstance = require_once Application::$MAIN_ROUTE . "/database/migrations/{$migration->migration}";

            $this->log("rolling back started {$migration->migration}");
            $migrationInstance->down();
            $this->log("rolling back ended {$migration->migration}");

        }

        if(!empty($lastMigration))
        {
            $this->deleteMigration(array_map(fn($migration) => $migration->id, $lastMigration));
        }else
        {
            $this->log("There are not any migration rollback file");
        }

    }

    private function getAppliedMigrations()
    {
        $statement = $this->db->pdo->prepare("SELECT migration , batch ,id from migrations");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    private function log($message)
    {
        $date = date("Y-m-d H:i:s");
        echo "[$date] - $message" . PHP_EOL;
    }

    private function createMigrationsTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS migrations(
            id INT PRIMARY KEY AUTO_INCREMENT,
            migration VARCHAR(255) NOT NULL,
            batch VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=INNODB";
        $this->db->pdo->exec($sql);
    }

    private function saveMigration($newMigration)
    {
        $batchNumber = $this->getLastBatchNumber() + 1;
        $row = implode(',',array_map(fn($migration) => "('$migration', $batchNumber)",$newMigration));
        $this->db->pdo->exec("INSERT INTO migrations(migration, batch)VALUES $row");
    }

    private function deleteMigration($migrationId)
    {
        $ids = implode(',', $migrationId);
        $this->db->pdo->exec("DELETE FROM migrations WHERE id IN ({$ids})");
    }

    private function getLastBatchNumber() : int
    {
        $statement = $this->db->pdo->prepare("SELECT MAX(batch) as max from migrations");
        $statement->execute();

        return $statement->fetch(PDO::FETCH_COLUMN) ?? 0;
    }

}