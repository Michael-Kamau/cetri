<?php

App\Queries;

use Illuminate\Database\DatabaseManager;

final class HomePageBlogs{

    protected $db;
    public function __construct(DatabaseManager $db)
    {
        $this->db = $db;
    }
    public function __invoke(int $days = 7)
    {
//        return $this->blogsTable()
//            ->union($this->barTable())
//            ->whereRaw('start_date >= (NOW() - INTERVAL ? DAY)', [$days])
//        ->get();



    }
    private function fooTable()
    {
        return $this->db->table('foo')
            ->where('type', '=', 'fooType');
    }
    private function barTable(int $days)
    {
        return $this->db->table('bar')
            ->where('type', '=', 'barType');
    }

}


