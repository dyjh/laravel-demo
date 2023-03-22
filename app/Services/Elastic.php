<?php

namespace App\Services;

use Elastic\Elasticsearch\ClientBuilder;
use Elastic\Elasticsearch\Exception\ClientResponseException;
use Elastic\Elasticsearch\Exception\MissingParameterException;
use Elastic\Elasticsearch\Exception\ServerResponseException;

class Elastic
{
    public \Elastic\Elasticsearch\Client $client;

    public string $index;

    /**
     * @Desc 构造函数中创建es实例
     * @param string $index
     * @throws \Elastic\Elasticsearch\Exception\AuthenticationException
     */
    public function __construct(string $index)
    {
        $this->index = $index;
        $this->client = ClientBuilder::create()
            ->setHosts(['http://localhost:9200'])
            ->setBasicAuthentication('elastic', '37LVAY8qAt8p8NncxuUg')
//            ->setCABundle('path/to/http_ca.crt')
            ->build();
    }

    /**
     * @Desc 初始化索引
     * @return void
     * @throws ClientResponseException
     * @throws MissingParameterException
     * @throws ServerResponseException
     */
    public function createIndex()
    {
        $str = '{"properties": {
            "type": { "type": "keyword" } ,
            "title": { "type": "text", "analyzer": "ik_smart" },
            "long_title": { "type": "text", "analyzer": "ik_smart" },
            "category_id": { "type": "integer" },
            "category": { "type": "keyword" },
            "category_path": { "type": "keyword" },
            "description": { "type": "text", "analyzer": "ik_smart" },
            "price": { "type": "scaled_float", "scaling_factor": 100 },
            "on_sale": { "type": "boolean" },
            "rating": { "type": "float" },
            "sold_count": { "type": "integer" },
            "review_count": { "type": "integer" },
            "skus": {
              "type": "nested",
              "properties": {
                "title": { "type": "text", "analyzer": "ik_smart", "copy_to": "skus_title" },
                "description": { "type": "text", "analyzer": "ik_smart", "copy_to": "skus_description" },
                "price": { "type": "scaled_float", "scaling_factor": 100 }
              }
            },
            "properties": {
              "type": "nested",
              "properties": {
                "name": { "type": "keyword" },
                "value": { "type": "keyword", "copy_to": "properties_value" },
                "search_value": { "type": "keyword"}
              }
            }
          }
        }';
        $this->client->index([
            'index' => $this->index,
            'body'  => ['mappings' => json_decode($str, true)]
        ]);

        //dd($res->asArray());
    }

    /**
     * @Desc 新增文档
     * @param int $id
     * @param string $body
     * @return void
     * @throws ClientResponseException
     * @throws MissingParameterException
     * @throws ServerResponseException
     */
    public function addData(int $id, string $body)
    {
        $index = $this->index;
        try {
            $this->client->create(compact('id', 'index', 'body'));
        } catch (\Exception $e) {
            if ($e->getCode() != 409) {
                throw $e;
            }
        }

    }

    /**
     * @Desc 检索
     * @param string|null $body
     * @return array
     * @throws ClientResponseException
     * @throws ServerResponseException
     */
    public function search(string $body = null)
    {
        $index = $this->index;
        return $this->client->search(compact('index', 'body'))->asArray();
    }

    public function update(int $id, string $body)
    {
        $index = $this->index;
        return $this->client->update(compact('id', 'index', 'body'))->asArray();
    }

    /**
     * @Desc 删除文档
     * @param int $id
     * @return array
     * @throws ClientResponseException
     * @throws MissingParameterException
     * @throws ServerResponseException
     */
    public function delete(int $id)
    {
        $index = $this->index;
        return $this->client->delete(compact('id', 'index'))->asArray();
    }
}
