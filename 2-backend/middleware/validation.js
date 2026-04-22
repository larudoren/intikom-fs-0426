import { body, param, validationResult } from 'express-validator';
import { products } from '../data/products.js';

const isNameTaken = (name, excludeId = null) => {
    return products.some(product => product.name.toLowerCase() === name.toLowerCase() && (excludeId === null || product.id !==excludeId));
};

export const validateProductForCreate = [
    body('name')
        .trim()
        .notEmpty().withMessage('Product name is required')
        .isLength({ min: 2, max: 100}).withMessage('Name must be 2-100 characters')
        .custom((value) => {
            if(isNameTaken(value)) {
                throw new Error('Product name already exists');
            }

            return true;
        }),
    body('price')
        .notEmpty().withMessage('Price is required')
        .isFloat({ min: 0.01}).withMessage('Price must be a positive number'),
];

export const validateProductForUpdate = [
    body('name')
        .trim()
        .notEmpty().withMessage('Product name is required')
        .isLength({ min: 2, max: 100}).withMessage('Name must be 2-100 characters')
        .custom((value, {req}) => {
            const productId = req.params.id;

            if(isNameTaken(value, productId)) {
                throw new Error('Product name already exists');
            }

            return true;
        }),
    body('price')
        .notEmpty().withMessage('Price is required')
        .isFloat({ min: 0.01}).withMessage('Price must be a positive number'),
];

export const validateId = [
    param('id')
        .isUUID().withMessage('Invalid product ID format'),
];

export const handleValidationErrors = (req, res, next) => {
    const errors = validationResult(req);

    if (!errors.isEmpty()) {
        return res.status(400).json({ errors: errors.array()});
    }
    next();
}