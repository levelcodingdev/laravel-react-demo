import { Link, useParams } from 'react-router';
import styles from './MentorProfile.module.css'
import { useMentor } from '../../api/queries/mentors/useMentor';
import SkeletonMentorProfile from './SkeletonMentorProfile';
import Error from '../../shared/ui/Error/Error';

const MentorProfile: React.FC = () => {
  const { id }  = useParams<{id: string}>();

  const { data: mentor, isLoading, error } = useMentor(parseInt(id ?? '0'));

  if (isLoading) {
    return (
      <SkeletonMentorProfile />
    )
  }

  if (error) return <Error />;

  return (
    <main className={styles['mentor-detail']}>
      <Link to={'/'} className={styles['back-link']}>&larr; Back to mentors</Link>


      <div className={styles['mentor-header']}>
        <img src={mentor?.avatar ?? 'https://randomuser.me/api/portraits/women/45.jpg'} alt={mentor?.fullName} className={styles['mentor-avatar']} />
        <div className={styles['mentor-info']}>
          <h1 className={styles['mentor-name']}>{mentor?.fullName}</h1>
          <div className={styles['mentor-title']}>{mentor?.title}</div>
          <div className={styles['mentor-expertise']}>{mentor?.expertise.slice(0, 3).join(' • ').toUpperCase()}</div>
        </div>
      </div>

      <section className={styles['mentor-bio']}>
        <h2>About {mentor?.fullName}</h2>
        <p>
          {mentor?.bio}
        </p>

        <h2>What I Can Help With</h2>
        <p>
          {mentor?.technicalBio}
        </p>

        <h2>My Mentoring Style</h2>
        <p>
            {mentor?.mentoringStyle}
        </p>
      </section>

      <section className={styles['mentor-requirements']}>
        <h3>Who I'm Looking For</h3>
        <p>
          {mentor?.audience}
        </p>
      </section>

      <div className={styles['apply-section']}>
        <Link to={`/mentor/${id}`} className={styles['btn-apply']}>
          Apply to Be My Mentee
        </Link>
      </div>
    </main>
  );
}

export default MentorProfile;