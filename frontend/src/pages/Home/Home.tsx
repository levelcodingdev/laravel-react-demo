import MentorList from "../../features/mentors/MentorsList";

const Home: React.FC = () => {
  return (
    <div>
        <header className="page-header">
            <h1>Find a Mentor</h1>
            <p>Get guidance from experienced developers, designers, and leaders.</p>
        </header>
        <MentorList />
    </div>
  );
}

export default Home;