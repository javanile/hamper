<?php

namespace Javanile\Hamper;

use Javanile\Hamper\PearDatabaseDecorator;

/**
 * Class HamperDatabase.
 *
 * The following methods are used to manipulate records into database.
 *
 * @package Javanile\Hamper
 */
class HamperDatabase extends PearDatabaseDecorator
{
    /**
     *
     */
    public $tables;

    /**
     * HamperDatabase constructor.
     * @param $pearDatabase
     */
    public function __construct($pearDatabase)
    {
        parent::__construct($pearDatabase);

        $this->tables = new HamperDatabaseTables($pearDatabase);
    }

    /**
     * Execute query.
     *
     * Executes the given parametric query
     *
     * @param string $sql The SQL parametric query to be sent.
     * @param array $params The parameters in use within the parametric query sent.
     * @param array $options Any additional option needed.
     *
     * @throws HamperException
     *
     * @usage $hdb->query($sql, $params = [], $options = [])
     *
     * @example // Execute simple query
     *          $hdb->query("SET NAMES utf8");
     *
     * @example // Execute prepare query
     *          $hdb->query("UPDATE vtiger_users SET language = ? WHERE user_name = ?", ["en_us", "admin"]);
     */
    public function query($sql, $params = [], $options = [])
    {
        $handler = OptionsHandlerFactory::createInstance($options);
        $results = $this->pearDatabase->pquery($sql, $params, $handler->dieOnError, $handler->message);

        if (!$results) {
            throw HamperException::forSqlError([
                'backtrace' => debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 1),
                'pearDatabase' => $this->pearDatabase,
                //'sql' => $sql,
                //'params' => $params,
                //'dieOnError' => $handler->dieOnError,
                //'message' => $handler->message
            ]);
        }

        return $results;
    }

    /**
     * Get a single record.
     *
     * Fetches the next row from the result set rows by the given parametric query.
     *
     * @param string $sql The SQL parametric query to be sent.
     * @param array $params The parameters in use within the parametric query sent.
     * @param array $options Any additional option needed.
     * @return array The result set rows.
     * @throws HamperException This exception is thrown if problems with the query arise.
     *
     * @usage $hdb->fetch($sql, $params = [], $options = [])
     *
     * @example // Execute simple query
     *          $hdb->query("SET NAMES utf8");
     *
     * @example // Execute prepare query
     *          $hdb->query("UPDATE vtiger_users SET language = ? WHERE user_name = ?", ["en_us", "admin"]);
     */
    public function fetch($sql, $params = [], $options = [])
    {
        $handler = OptionsHandlerFactory::createInstance($options);
        $results = $this->pearDatabase->pquery($sql, $params, $handler->dieOnError, $handler->message);

        if (!$results) {
            throw HamperException::forSqlError(array(
                'backtrace' => debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 1),
                'pearDatabase' => $this->pearDatabase,
                //'sql' => $sql,
                //'params' => $params,
                //'dieOnError' => $handler->dieOnError,
                //'message' => $handler->message
            ));
        }

        try {
            return $this->pearDatabase->query_result_rowdata($results);
        } catch (\Exception $e) {
            // The above HamperException prevent this legacy exception
        }
    }

    /**
     * Get a list of records.
     *
     * Returns an array containing all of the result set rows by the given parametric query.
     *
     * @param string $sql The SQL parametric query to be sent.
     * @param array $params The parameters in use within the parametric query sent.
     * @param array $options Any additional option needed.
     * @return array The result set rows.
     * @throws HamperException This exception is thrown if problems with the query arise.
     *
     * @usage query($sql, $params = [], $options = [])
     *
     * @example // Execute simple query
     *          $hdb->query("SET NAMES utf8");
     *
     * @example // Execute prepare query
     *          $hdb->query("UPDATE vtiger_users SET language = ? WHERE user_name = ?", ["en_us", "admin"]);
     */
    public function fetchAll($sql, $params = [], $options = [])
    {
        $handler = OptionsHandlerFactory::createInstance($options);
        $results = $this->pearDatabase->pquery($sql, $params, $handler->dieOnError, $handler->message);

        if (!$results) {
            throw HamperException::forSqlError(array(
                'backtrace' => debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 1),
                'pearDatabase' => $this->pearDatabase,
                //'sql' => $sql,
                //'params' => $params,
                //'dieOnError' => $handler->dieOnError,
                //'message' => $handler->message
            ));
        }

        $rows = [];

        try {
            for ($rowIndex = 0; $rowIndex < $this->pearDatabase->num_rows($results); $rowIndex++) {
                $rows[$rowIndex] = $this->pearDatabase->query_result_rowdata($results, $rowIndex);
            }
        } catch (\Exception $e) {
            // The above HamperException prevent this legacy exception
        }

        return $rows;
    }

    /**
     * Get a value from record.
     *
     * Fetches the next row from the result set rows by the given parametric query.
     *
     * @param string $sql The SQL parametric query to be sent.
     * @param array $params The parameters in use within the parametric query sent.
     * @param array $options Any additional option needed.
     * @return array The result set rows.
     * @throws HamperException This exception is thrown if problems with the query arise.
     *
     * @usage $hdb->fetchValue($sql, $params = [], $options = [])
     *
     * @example $crmId = $hdb->fetchValue("SELECT crmid FROM vtiger_crmentity WHERE setype=? AND deleted=0", [$module]);
     *
     * @legacy $adb = \PearDatabase::getInstance();
     *         $result = $adb->pquery("SELECT tabid FROM vtiger_tab WHERE name=?", [$setype]);
     *         $tabId = $adb->query_result($result, 0, "tabid");
     */
    public function fetchValue($sql, $params = [], $options = [])
    {
        $handler = OptionsHandlerFactory::createInstance($options);
        $results = $this->pearDatabase->pquery($sql, $params, $handler->dieOnError, $handler->message);

        if (!$results) {
            throw HamperException::forSqlError(array(
                'backtrace' => debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 1),
                'pearDatabase' => $this->pearDatabase,
                //'sql' => $sql,
                //'params' => $params,
                //'dieOnError' => $handler->dieOnError,
                //'message' => $handler->message
            ));
        }

        try {
            return $this->pearDatabase->query_result_rowdata($results);
        } catch (\Exception $e) {
            // The above HamperException prevent this legacy exception
        }
    }

    /**
     * Get value by key column.
     *
     * Execute a query to check if record with specific key and value exists.
     *
     * @param string $table The table's name on which the insert has to be executed.
     * @param $key
     * @param $value
     * @param array $options Any additional option needed.
     *
     * @return bool
     * @throws HamperException
     *
     * @usage query($sql, $params = [], $options = [])
     *
     * @example // Execute simple query
     *          $hdb->query("SET NAMES utf8");
     *
     * @example // Execute prepare query
     *          $hdb->query("UPDATE vtiger_users SET language = ? WHERE user_name = ?", ["en_us", "admin"]);
     */
    public function value($table, $key, $value, $options=[])
    {
        $sql = "SELECT `${key}` FROM `{$table}` WHERE `${key}` = ? LIMIT 1";

        $handler = OptionsHandlerFactory::createInstance($options);
        $results = $this->pearDatabase->pquery($sql, [$value], $handler->dieOnError, $handler->message);

        if (!$results) {
            throw HamperException::forSqlError(array(
                'backtrace' => debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 1),
                'pearDatabase' => $this->pearDatabase,
                //'sql' => $sql,
                //'params' => $params,
                //'dieOnError' => $handler->dieOnError,
                //'message' => $handler->message
            ));
        }

        try {
            return boolval($this->pearDatabase->query_result_rowdata($results));
        } catch (\Exception $e) {
            // The above HamperException prevent this legacy exception
        }

        return false;
    }

    /**
     * Check if record exists.
     *
     * Execute a query to check if record with specific key and value exists.
     *
     * @param string $table The table's name on which the insert has to be executed.
     * @param $key
     * @param $value
     * @param array $options Any additional option needed.
     *
     * @return bool
     * @throws HamperException
     *
     * @usage query($sql, $params = [], $options = [])
     *
     * @example // Execute simple query
     *          $hdb->query("SET NAMES utf8");
     *
     * @example // Execute prepare query
     *          $hdb->query("UPDATE vtiger_users SET language = ? WHERE user_name = ?", ["en_us", "admin"]);
     */
    public function exists($table, $key, $value, $options=[])
    {
        $sql = "SELECT `${key}` FROM `{$table}` WHERE `${key}` = ? LIMIT 1";

        $handler = OptionsHandlerFactory::createInstance($options);
        $results = $this->pearDatabase->pquery($sql, [$value], $handler->dieOnError, $handler->message);

        if (!$results) {
            throw HamperException::forSqlError(array(
                'backtrace' => debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 1),
                'pearDatabase' => $this->pearDatabase,
                //'sql' => $sql,
                //'params' => $params,
                //'dieOnError' => $handler->dieOnError,
                //'message' => $handler->message
            ));
        }

        try {
            return boolval($this->pearDatabase->query_result_rowdata($results));
        } catch (\Exception $e) {
            // The above HamperException prevent this legacy exception
        }

        return false;
    }

    /**
     * Insert a record.
     *
     * Inserts the given record within the selected table.
     *
     * @param string $table The table's name on which the insert has to be executed.
     * @param mixed $data The data to be inserted into the selected table, in the form of $data = ['field_1' => 'value_1','field_2' => 'value_2'].
     * @param array $options Any additional option needed.
     * @throws HamperException
     *
     * @usage query($sql, $params = [], $options = [])
     *
     * @example // Execute simple query
     *          $hdb->query("SET NAMES utf8");
     *
     * @example // Execute prepare query
     *          $hdb->query("UPDATE vtiger_users SET language = ? WHERE user_name = ?", ["en_us", "admin"]);
     */
    public function insert($table, $data, $options=[])
    {
        $fields = '`' . implode('`, `', array_keys($data)) . '`';
        $values = implode(', ', array_fill(0, count($data), '?'));

        $sql = "INSERT INTO {$table} ({$fields}) VALUES ({$values})";

        $handler = OptionsHandlerFactory::createInstance($options);
        $results = $this->pearDatabase->pquery($sql, array_values($data), $handler->dieOnError, $handler->message);

        if (!$results) {
            throw HamperException::forSqlError(array(
                'backtrace' => debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 1),
                'pearDatabase' => $this->pearDatabase,
                //'sql' => $sql,
                //'params' => $params,
                //'dieOnError' => $handler->dieOnError,
                //'message' => $handler->message
            ));
        }

        return $results;
    }

    /**
     * Get last ID.
     *
     * Return last insert ID value for the selected table.
     *
     * @param string $table The table's name on which the insert has to be executed.
     * @return mixed
     *
     * @usage query($sql, $params = [], $options = [])
     *
     * @example // Execute simple query
     *          $hdb->query("SET NAMES utf8");
     *
     * @example // Execute prepare query
     *          $hdb->query("UPDATE vtiger_users SET language = ? WHERE user_name = ?", ["en_us", "admin"]);
     */
    public function lastInsertId(string $table = '')
    {
        return $this->pearDatabase->getLastInsertID($table);
    }

    /**
     * Update a single record.
     *
     * Updates the given record with the given data.
     *
     * @param mixed $table The table on which the update has to be executed.
     * @param $key
     * @param mixed $data The data to be updated into the selected table, in the form of $data = ['field_1' => 'value_1','field_2' => 'value_2'].
     * @param array $options Any additional option needed.
     * @throws HamperException
     *
     * @usage query($sql, $params = [], $options = [])
     *
     * @example // Execute simple query
     *          $hdb->query("SET NAMES utf8");
     *
     * @example // Execute prepare query
     *          $hdb->query("UPDATE vtiger_users SET language = ? WHERE user_name = ?", ["en_us", "admin"]);
     */
    public function update($table, $key, $data, $options = [])
    {
        $handler = OptionsHandlerFactory::createInstance($options);

        if (empty($data[$key])) {
            throw HamperException::forMissingKey(array(
                'backtrace' => debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 1),
            ));
        }

        if (!$data || !is_array($data)) {
            throw HamperException::forMissingData(array(
                'backtrace' => debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 1),
            ));
        }

        $fields = '`' . implode('` = ?, `', array_keys($data)) . '` = ?';
        $params = array_merge(array_values($data), [$data[$key]]);

        $sql = "UPDATE `{$table}` SET {$fields} WHERE `{$key}` = ?";
        $results = $this->pearDatabase->pquery($sql, $params, $handler->dieOnError, $handler->message);

        if (!$results) {
            throw HamperException::forSqlError(array(
                'backtrace' => debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 1),
                'pearDatabase' => $this->pearDatabase,
                //'sql' => $sql,
                //'params' => $params,
                //'dieOnError' => $handler->dieOnError,
                //'message' => $handler->message
            ));
        }

        return $results;
    }

    /**
     * Delete a single record.
     *
     * Deletes the given record within the given table.
     *
     * @param mixed $table The table and record on which the delete has to be executed.
     * @param $key
     * @param $value
     * @param array $options Any additional option needed.
     * @throws HamperException
     *
     * @usage query($sql, $params = [], $options = [])
     *
     * @example // Execute simple query
     *          $hdb->query("SET NAMES utf8");
     *
     * @example // Execute prepare query
     *          $hdb->query("UPDATE vtiger_users SET language = ? WHERE user_name = ?", ["en_us", "admin"]);
     */
    public function delete($table, $key, $value, $options = [])
    {
        $sql = "DELETE FROM `{$table}` WHERE `${key}` = ?";

        $handler = OptionsHandlerFactory::createInstance($options);
        $results = $this->pearDatabase->pquery($sql, [$value], $handler->dieOnError, $handler->message);

        if (!$results) {
            throw HamperException::forSqlError(array(
                'backtrace' => debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 1),
                'pearDatabase' => $this->pearDatabase,
                //'sql' => $sql,
                //'params' => $params,
                //'dieOnError' => $handler->dieOnError,
                //'message' => $handler->message
            ));
        }

        return $results;
    }
}
