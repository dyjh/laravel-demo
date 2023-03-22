<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\Elastic;

class ElasticDemo extends Controller
{
    /**
     * 初始化数据
     * @return void
     * @throws \Elastic\Elasticsearch\Exception\ClientResponseException
     * @throws \Elastic\Elasticsearch\Exception\MissingParameterException
     * @throws \Elastic\Elasticsearch\Exception\ServerResponseException
     */
    public function initData()
    {
        (new Elastic('products'))->createIndex();
        $data = Product::with([
            'skus:title,description,price,product_id',
            'properties:product_id,name,value'
        ])->get()->toArray();
        foreach ($data as $datum) {
            foreach ($datum['properties'] as $property) {
                $property['search_value'] = "{$property['name']}:{$property['value']}";
            }
            $datum['on_sale'] = (bool)$datum['on_sale']
            (new Elastic('products'))->addData($datum['id'], json_encode($datum));
        }
    }

    /**
     * @Desc 查询
     * @return void
     * @throws \Elastic\Elasticsearch\Exception\ClientResponseException
     * @throws \Elastic\Elasticsearch\Exception\ServerResponseException
     */
    public function search()
    {
        $bodyArr = [
            'query' => [
                'bool' => [
                    'filter' => [
                        [
                            'term' => ['on_sale' => true]
                        ]
                    ],
                    'must' => [
                        [
                            'multi_match' => [
                                'query' => "金士顿",
                                'type' => 'best_fields',
                                'fields' => [
                                    "title^3",
                                    "long_title^2",
                                    "category^2",
                                    "description",
                                    "skus_title",
                                    "skus_description",
                                    "properties_value",
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            'aggs' => [
                'properties_count' => [
                    'nested' => ['path' => 'properties'],
                    'aggs' => [
                        'properties_name' => [
                            'terms' => ['field' => 'properties.name'],
                            'aggs' => [
                                'properties_value' => [
                                    'terms' => ['field' => 'properties.value']
                                ]
                            ]
                        ],
                    ]
                ]
            ]
        ];
        $res = (new Elastic('products'))->search(json_encode($bodyArr));
        dd($res);
    }
}
