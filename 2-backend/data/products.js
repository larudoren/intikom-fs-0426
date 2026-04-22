export let products = [];

export const findProductIndex = (id) => products.findIndex(p => p.id === id)