<?php

namespace App\View\Components\Table;


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

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(array|ArrayAccess $content, string $columns, string $route)
    {
        $this->content = $content ?? [];
        $this->route = $this->formatRouteString($route);
        $this->columns = $this->formatColumnString($columns);
    }

    /**
     * @param string $columnsString
     * @return array
     */
    private function formatColumnString(string $columnsString): array
    {
        $columns = [];

        $columnsStringArr = explode(" ",$columnsString);
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
     * Get the view / contents that represent the component.
     * @return Application|Factory|View
     */
    public function render(): Application|Factory|View
    {
        return view('components.table.table');
    }
}
