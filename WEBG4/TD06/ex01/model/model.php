<?php

abstract class Model {

    protected function request($sql, $params = null, $one = false) {
        $db = new PDO("mysql:host=localhost;dbname=ValvesDB;charset=utf8", "webii", "6zNlwgrIk78UWHQw",
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION] // par défaut en PHP8
        );
        if ($params == null) {
            $result = $db->query($sql);
        } else {
            $result = $db->prepare($sql);
            $result->execute($params);
        }
        if ($one) {
            $result = $result->fetch();
        }
        return $result;
    }
}
