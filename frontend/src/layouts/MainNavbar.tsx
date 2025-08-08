import React from 'react';
import { Link } from 'react-router';

const MainNavbar: React.FC = () => {
  return (
    <nav className="navbar">
      <div className="nav-container">
        <Link to={'/'} className="nav-logo">MentorHub</Link>
      </div>
    </nav>
  );
};

export default MainNavbar;