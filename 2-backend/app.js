import express from 'express';
import helmet from 'helmet';
import rateLimit from 'express-rate-limit';
import ProductRoutes from './routes/productRoutes.js';
import { errorHandler } from './middleware/errorHandler.js';

const app = express();

app.use(helmet());

const limiter = rateLimit({
    windowMs: 15 * 60 * 1000,
    max: 100,
    message: 'Too many requests from this IP, please try again later.',
});

app.use(limiter);

app.use(express.json());
app.use(express.urlencoded({ extended: true}));

app.use('/products', ProductRoutes);

app.use(errorHandler);

export default app;