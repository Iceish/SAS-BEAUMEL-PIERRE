<?php

namespace App\View\Components\Generic;


use ArrayAccess;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use JetBrains\PhpStorm\ArrayShape;
use function view;

class Table extends Component
{
    public array|ArrayAccess $content;
    public array $columns;
    public array $route;
    public array $crud;
    public string $perm;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(array|ArrayAccess $content, string $columns, string $route, string $crud)
    {
        $this->content = $content ?? [];
        $this->route = $this->formatRouteString($route);
        $this->columns = $this->formatColumnString($columns);
        $this->crud = $this->formatCrudString($crud);
        $this->perm = substr(strstr($this->route['route'], '.'),1);
    }

    /**
     * @param string $columnsString
     * @return array
     */
    private function formatColumnString(string $columnsString): array
    {
        $columns = [];

        $columnsStringArr = explode(",",$columnsString);
        foreach ($columnsStringArr as $columnString){
            $columnArr = explode("|",$columnString);
            $columnName = $columnArr[0];
            if($columnName !== ""){
                $column = [];
                $column["name"] = str_replace('_',' ',$columnName);
                $columnAttributeString = $columnArr[1] ?? $columnName;
                $columnAttributeArr = explode(":",$columnAttributeString);
                $column["attributeName"] = $columnAttributeArr[0];
                $column["attributeNameF"] = $columnAttributeArr[1] ?? null;
                $columns[] = $column;
            }
        }
        return $columns;
    }

    /**
     * @param string $routeString
     * @return array
     */
    #[ArrayShape(["route" => "string", "parameters" => "string"])]
    private function formatRouteString(string $routeString): array
    {
        $routeArr = explode(":",$routeString);
        return [
            "route" => $routeArr[0],
            "parameters"=> $routeArr[1] ?? ""
        ];
    }

    /**
     * @param string $crudString
     * @return array
     */
    private function formatCrudString(string $crudString): array
    {
        return explode(" ",$crudString) ?? [];
    }


    /**
     * Get the view / contents that represent the component.
     * @return Application|Factory|View
     */
    public function render(): Application|Factory|View
    {
        return view('components.generic.table');
    }
}
