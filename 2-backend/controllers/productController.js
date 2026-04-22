import { products, findProductIndex } from "../data/products.js";
import { v4 as uuidv4 } from "uuid";

export const getAllProducts = (req, res) => {
    res.status(200).json(products);
};

export const createProduct = (req, res) => {
    const { name, price } = req.body;

    const newProduct = {
        id: uuidv4(),
        name: name.trim(),
        price: parseFloat(price),
    };
    
    products.push(newProduct);
    res.status(201).json(newProduct);
};

export const updateProduct = (req, res) => {
    const { id } = req.params;
    const { name, price } = req.body;
    const index = findProductIndex(id);

    if (index === -1) {
        return res.status(404).json({ message: 'Product not found' });
    }

    products[index] = {
        ...products[index],
        name: name.trim(),
        price: parseFloat(price),
    };

    res.status(200).json(products[index]);
};

export const deleteProduct = (req, res) => {
    const { id } = req.params;
    const index = findProductIndex(id);
    
    if (index === -1) {
        return res.status(404).json({ message: 'Product not found' });
    }

    products.splice(index, 1);
    res.status(200).json({ message: 'Product deleted successfully' });
}