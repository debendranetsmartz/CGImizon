<?php
/**
 * Debendra Prusty
 * Netsmartz
 */
namespace Netsmartz\Book\Block;
use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Api\Data\ProductInterfaceFactory;
use Magento\Catalog\Model\Product;
use Magento\Checkout\Block\Cart\Additional\Info as AdditionalBlockInfo;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\View\Element\Template as ViewTemplate;
use Magento\Framework\View\Element\Template\Context;
/**
 * Class CartItemIsbnBlock
 */
class CartItemIsbnBlock extends ViewTemplate
{
    /**
     * Product
     *
     * @var ProductInterface|null
     */
    protected $product = null;
    /**
     * Product Factory
     *
     * @var ProductInterfaceFactory
     */
    protected $productFactory;
    /**
     * CartItemIsbnBlock constructor
     *
     * @param Context $context
     * @param ProductInterfaceFactory $productFactory
     */
    public function __construct(
        Context $context,
        ProductInterfaceFactory $productFactory
    ) {
        parent::__construct($context);
        $this->productFactory = $productFactory;
    }
    /**
     * Get Product Isbn Text
     *
     * @return string
     */
    public function getProductIsbn(): string
    {
        $product = $this->getProduct();
        $productIsbn = "";
        if($product->getData('isbn')) {
            $productIsbn = (string) $product->getData('isbn');
        }
        return $productIsbn;
    }
    /**
     * Get product from quote item
     *
     * @return ProductInterface
     */
    public function getProduct(): ProductInterface
    {
        try {
            $layout = $this->getLayout();
        } catch (LocalizedException $e) {
            $this->product = $this->productFactory->create();
            return $this->product;
        }
        /** @var AdditionalBlockInfo $block */
        $block = $layout->getBlock('additional.product.info');
        if ($block instanceof AdditionalBlockInfo) {
            $item = $block->getItem();
            $this->product = $item->getProduct();
        }
        return $this->product;
    }
}
