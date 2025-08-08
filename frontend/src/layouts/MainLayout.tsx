import { Outlet } from "react-router";
import MainNavbar from "./MainNavbar";

const MainLayout: React.FC = () => {
  return (
    <>
        <MainNavbar />
        <div className="page-container">
            <Outlet />
        </div>
    </>
  );
}

export default MainLayout;