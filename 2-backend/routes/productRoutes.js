import express from 'express';
import { 
    getAllProducts, 
    createProduct,
    updateProduct,
    deleteProduct,
} from '../controllers/productController.js';
import { 
    validateProductForCreate,
    validateProductForUpdate,
    validateId,
    handleValidationErrors,
} from '../middleware/validation.js';

const Productrouter = express.Router();

Productrouter.get('/', getAllProducts);
Productrouter.post('/', validateProductForCreate, handleValidationErrors, createProduct);
Productrouter.put('/:id', validateId, validateProductForUpdate, handleValidationErrors, updateProduct);
Productrouter.delete('/:id', validateId, handleValidationErrors, deleteProduct);

export default Productrouter;