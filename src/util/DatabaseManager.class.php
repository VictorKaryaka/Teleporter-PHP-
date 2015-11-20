<?php

class DatabaseManager
{
    private $getConnection;

    /**
     * DatabaseManager constructor.
     */
    public function __construct()
    {
        $config = parse_ini_file('/db_config.ini') or die('File db_config.ini not found');

        $dsn = 'mysql' . ':host=' . $config['db_host'] . ';dbname=' . $config['db_name'];
        try {
            $this->getConnection = new PDO($dsn, $config['db_user'], $config['db_pass']);
        } catch (PDOException $ex) {
            die('MySQL connection error: ' . $ex->getMessage());
        }

        $this->createTeleporterLogTable();
    }

    /**
     * The function create table 'teleporter_log in database
     */
    private function createTeleporterLogTable()
    {
        $sql = 'CREATE TABLE IF NOT EXISTS `teleporter_log` (
               `log_id` INT NOT NULL AUTO_INCREMENT,
               `log_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
               `iterations_count` INT,
               `final_runtime` FLOAT,
                PRIMARY KEY (`log_id`))
                ENGINE=MyISAM;';

        $this->getConnection->query($sql);
    }

    /**
     * @param $iterations
     *
     * The function write log to database
     */
    public function writeLog($iterations)
    {
        $final_runtime = round(microtime(true) - START_RUNTIME, 4);
        $sql = 'INSERT INTO `teleporter_log` (`iterations_count`, `final_runtime`) VALUES (?,?);';
        $statement = $this->getConnection->prepare($sql);
        $statement->execute(array($iterations, $final_runtime));
    }
}