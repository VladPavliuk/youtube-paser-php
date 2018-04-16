<?php

class Query extends Model
{
    public function index()
    {
        $queriesList = [];

        $query = db()->prepare("SELECT * FROM search_queries");
        $query->execute();

        while($row = $query->fetch()) {
            $queriesList[] = [
                'id' => $row['id'],
                'value' => urldecode($row['search_query'])
            ];
        }

        return $queriesList;
    }

    public function store($queryObj)
    {
        $query = db()->prepare("INSERT INTO search_queries (search_query) VALUE (:search_query)");
        $query->execute([
            'search_query' => $queryObj['title']
        ]);

        return true;
    }

    public function show($id)
    {
        $query = db()->prepare("SELECT * FROM search_queries WHERE id = :id");
        $query->execute([
            ':id' => $id
        ]);

        return $this->getFields($query->fetch(), 'id', 'search_query');
    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}