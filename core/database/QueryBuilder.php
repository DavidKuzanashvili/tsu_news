<?php


class QueryBuilder
{
    protected PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param $table string
     * @param $condition string
     * @param $clazz string
     * @return array
     */
    public function all($table, $condition, $clazz)
    {
        $condition = !empty($condition) ? ' where '.$condition : '';

        $statement = $this->pdo->prepare("select * from {$table}".$condition);

        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS, $clazz);
    }

    /**
     * @param $table string
     * @param $condition string
     * @param $clazz string
     * @return stdClass
     */
    public function firstOrDefault($table, $condition, $clazz)
    {
        $statement = $this->pdo->prepare("select * from {$table} where {$condition}");

        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, $clazz);

        return $statement->fetch();
    }

    /**
     * @param $table string
     * @param $parameters array
     * @return boolean
    */
    public function add($table, $parameters) {
        $query = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        $statement = $this->pdo->prepare($query);

        return $statement->execute($parameters);
    }

    /**
     * @param $table string
     * @param $parameters array
     * @param $condition string
     * @return boolean
     */
    public function update($table, $parameters, $condition) {
        $strParams = '';
        foreach ($parameters as $key => $value) {
            $strParams = $strParams."{$key}='{$value}', ";
        }
        $strParams = substr($strParams, 0, strlen($strParams) - 2).' ';
        //dd($strParams);
        $query = sprintf(
            "update %s set %s where ".$condition,
            $table,
            $strParams
        );
        //dd($query);

        $statement = $this->pdo->prepare($query);

        return $statement->execute();
    }

    /**
     * @param $table string
     * @param $condition string
     * @return boolean
     */
    public function delete($table, $condition) {
        $query = "delete from {$table} where {$condition}";

        $statement = $this->pdo->prepare($query);

        return $statement->execute();
    }
}