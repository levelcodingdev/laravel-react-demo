import { Route, Routes } from "react-router"
import MainLayout from "./layouts/MainLayout"
import Home from "./pages/Home/Home"
import MentorProfile from "./pages/MentorProfile/MentorProfile"
import Login from "./pages/Auth/Login"
import Register from "./pages/Auth/Register"

const App: React.FC = () => {


  return (
    <>
      <Routes>
        <Route element={<MainLayout />}>
          <Route path="" element={<Home />}/>
          <Route path="/mentor/:id" element={<MentorProfile />}/>
          <Route path="/auth/login" element={<Login />}/>
          <Route path="/auth/register" element={<Register />}/>
        </Route>
      </Routes>
    </>
  )
}

export default App
