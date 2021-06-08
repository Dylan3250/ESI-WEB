<?php

namespace App\Http\Controllers;

use App\Models\Repository;

class CtrlAPICommits extends Controller {

    public function getRepository($id) {
        $repository = Repository::getRepository($id);
        if ($repository) {
            $formattedData = [];
            $formattedData["repository_name"] = $repository[0]->repositoriy_name;
            $formattedData["user_name"] = $repository[0]->user_name;

            $commits = [];
            foreach ($repository as $commitRepo) {
                $commit = [];
                $commit["message"] = $commitRepo->message;
                $commit["date"] = $commitRepo->date;
                $commits[] = $commit;
            }
            $formattedData["commit"] = $commits;
        } else {
            $formattedData = false;
        }
        return response()->json($formattedData);
    }
}
