<?php

class Helper
{
    /**
     * Exeibe um parâmetro de forma estruturada e finaliza a aplicação
     *
     * @param  mixed $params
     * @param  bool $die true se deseja encerrar a aplicação e false para o contrário
     * @return void
     */
    public static function dd($params = [], $die = true)
    {
        echo '<pre>';
        var_dump($params);
        echo '</pre>';

        if ($die) die();
    }

    /**
     * Redireciona um usuário para a URL informada e finaliza a aplicação
     *
     * @param  string $url URL a ser redirecionada
     * @return void
     */
    public static function redirect($url)
    {
        header('Location: ' . $url);
        exit;
    }

    public static function dbPrepateData($data)
    {
        $returnData = [];
        foreach($data as $key => $value) {
            $returnData[$key] = self::dbPrepateValue($value);
        }

        return $returnData;
    }

    public static function dbPrepateValue($value)
    {
        if ($value != null) {
            $value = htmlspecialchars($value);
            $value = addslashes($value);
        }

        return $value;
    }

    public static function dbDataToParseString($data, $id = null)
    {
        $returnData = null;

        if ($id != null) {
            $returnData = 'id=' . $id;
        }

        foreach($data as $key => $value) {
            if ($value == null) {
                continue;
            }
            if ($returnData == null) {
                $returnData .= $key . '=' . $value;
                continue;
            }

            $returnData .= '&' .$key . '=' . $value;
        }

        return $returnData;
    }

    public static function dbDataToWhereOR($data)
    {
        $returnData = null;

        foreach($data as $key => $value) {
            if ($value == null) {
                continue;
            }

            if ($returnData == null) {
                $returnData .= " WHERE " . $key . " = :" . $key;
                continue;
            }

            $returnData .= " OR " . $key . " = :" . $key;
        }

        return $returnData;
    }
}