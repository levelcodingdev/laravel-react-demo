import styles from './SkeletonMentorCard.module.css';

const SkeletonMentorCard: React.FC = () => {
  return (
    <article className={styles['mentor-card']}>
      <div className={styles['mentor-avatar']} />
      <div className={styles['mentor-name']} />
      <div className={styles['mentor-title']} />
      <div className={styles['mentor-expertise']} />
      <div className={styles['mentor-link']} />
    </article>
  );
};

export default SkeletonMentorCard;