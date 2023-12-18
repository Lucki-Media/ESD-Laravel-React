import "./App.scss";

import { BrowserRouter, Routes, Route } from "react-router-dom";
import Homepage from "./pages/Homepage";
import Converge from "./pages/Converge";
import Collaborate from "./pages/Collaborate";
import Cogitate from "./pages/Cogitate";
import Archive from "./pages/Archive";
import Communicate from "./pages/Communicate";

const App = () => {
  return (
    <>
      <BrowserRouter>
        <Routes>
          <Route path="/" element={<Homepage />}></Route>
          <Route path="/converge" element={<Converge />}></Route>
          <Route path="/collaborate" element={<Collaborate />}></Route>
          <Route path="/cogitate" element={<Cogitate />}></Route>
          <Route path="/communicate" element={<Communicate />}></Route>
          <Route path="/archive" element={<Archive />}></Route>
        </Routes>
      </BrowserRouter>
    </>
  );
};

export default App;
