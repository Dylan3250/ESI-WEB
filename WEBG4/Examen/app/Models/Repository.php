<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Repository {

    public static function getRepositories() {
        return DB::select("SELECT repositories.id, repositories.name repoName, contributors.name userName, count(repository_id) nbCommit
            FROM repositories
            LEFT JOIN contributors ON login = contributor_login
            LEFT JOIN commits ON repository_id = repositories.id
            GROUP BY repositories.id, repoName, userName ORDER BY repositories.id ASC");
    }

    public static function getRepository($id) {
        return DB::select("SELECT repositories.name repositoriy_name, contributors.name user_name, message, date
            FROM repositories
            LEFT JOIN contributors ON login = contributor_login
            LEFT JOIN commits ON repository_id = repositories.id
            WHERE repositories.id = ?", [$id]);
    }
}
