import { Link } from 'react-router';
import styles from './MentorCard.module.css'
import type { Mentor } from '../../types/mentor';


const MentorCard: React.FC<Mentor> = ({
  id,
  title,
  fullName,
  expertise,
  avatar
}) => {
  return (
    <>
    <article className={styles['mentor-card']}>
        <img src={avatar ?? 'https://randomuser.me/api/portraits/women/45.jpg'} alt={fullName} className={styles['mentor-avatar']} />
        <h2 className={styles['mentor-name']}>{fullName}</h2>
        <div className={styles['mentor-title']}>{title}</div>
        <div className={styles['mentor-expertise']}>{expertise.slice(0, 3).join(' • ').toUpperCase()}</div>
        <Link to={`/mentor/${id}`} className={styles['mentor-link']}>View Profile</Link>
      </article>
    </>
  );
}

export default MentorCard;