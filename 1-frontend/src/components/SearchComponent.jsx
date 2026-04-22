import { useState, useEffect } from "react";
import ProductCard from "./ProductCard";

const SearchComponent = ({ products }) => {
    const [searchTerm, setSearchTerm] = useState('');
    const [filteredProducts, setFilteredProducts] = useState(products);

    useEffect(() => {
        const filtered = products.filter(product =>
            product.name.toLowerCase().includes(searchTerm.toLowerCase())
        );
        setFilteredProducts(filtered);
    }, [searchTerm, products]);

    const handleSearchChange = (event) => {
        setSearchTerm(event.target.value);
    };

    return (
        <div className="search-container">
            <div className="search-input-wrapper">
                <input
                    type="text"
                    placeholder="Cari produk berdasarkan nama..."
                    value={searchTerm}
                    onChange={handleSearchChange}
                    className="search-input"
                />
            </div>
            
            {filteredProducts.length > 0 && 
                 <div className="results-count">
                {filteredProducts.length} produk ditemukan
                </div>
            }
           

            <div className="products-grid">
                {filteredProducts.length > 0 ? (
                filteredProducts.map(product => (
                    <ProductCard key={product.id} product={product} />
                ))
                ) : (
                <div className="no-results">
                    <p>Tidak ada produk ditemukan dengan pencarian "{searchTerm}"</p>
                </div>
                )}
            </div>
        </div>
    );
};

export default SearchComponent;