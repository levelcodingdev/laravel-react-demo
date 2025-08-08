import { useMentors } from "../../api/queries/mentors/useMentors";
import Error from "../../shared/ui/Error/Error";
import MentorCard from "./MentorCard";
import SkeletonMentorCard from "./SkeletonMentorCard";

const MentorList: React.FC = () => {
  const { data: mentors, isLoading, error } = useMentors();

if (isLoading) {
  return (
    <main className="mentors-grid">
      <SkeletonMentorCard />
      <SkeletonMentorCard />
      <SkeletonMentorCard />
      <SkeletonMentorCard />
      <SkeletonMentorCard />
      <SkeletonMentorCard />
    </main>
  );
}

  if (error) return <Error />;
  if (!mentors || mentors.length === 0) return <p>No mentors available.</p>;
  
  return (
    <>
        <main className="mentors-grid">
          {mentors.map((mentor) => (
            <MentorCard key={mentor.id} {...mentor} />
          ))}
        </main>
    </>
  );
}

export default MentorList;