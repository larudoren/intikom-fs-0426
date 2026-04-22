import './App.css';
import SearchComponent from './components/SearchComponent';
import { products } from './data/products';

function App() {

  return (
    <>
      <header className="app-header">
        <h1>Pencarian Produk</h1>
        <p>Cari produk berdasarkan nama - tampilan hasil langsung</p>
      </header>
      <main>
        <SearchComponent products={products} />
      </main>
    </>
  )
}

export default App
