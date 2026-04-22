import '../styles/ProductCard.css';

const ProductCard = ({ product }) => {
    return (
        <div className="product-card">
            <h3 className="product-name">{product.name}</h3>
            <p className="product-price">${product.price.toFixed(2)}</p>
        </div>
    );
};

export default ProductCard;