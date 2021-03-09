<?php
/**
 * Debendra Prusty
 * Netsmartz
 */
namespace Netsmartz\Book\Block;

class Getproduct extends \Magento\Framework\View\Element\Template
{
    /**
     * Get product from Elasticsearch
     *
     * @return Products Data
     */
    public function getProductlist()
    {
        $apiURL= "localhost:9200/magento2_product_1_v2/_search?pretty&q=*:*";
        $ch = curl_init($apiURL);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        $result =  json_decode($result, true);
        return $result['hits']['hits'];
    }
}
