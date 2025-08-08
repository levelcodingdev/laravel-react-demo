import styles from './SkeletonMentorProfile.module.css';

const SkeletonMentorProfile: React.FC = () => {
  return (
    <main className={styles['mentor-detail']}>
      <div className={styles['back-link']}></div>

      <div className={styles['mentor-header']}>
        <div className={styles['mentor-avatar']} data-testid="skeleton-avatar"/>
        <div className={styles['mentor-info']}>
          <div className={styles['mentor-name']} />
          <div className={styles['mentor-title']} />
          <div className={styles['mentor-expertise']} />
        </div>
      </div>

      <div className={styles['apply-section']}>
        <div className={styles['btn-apply']} />
      </div>
    </main>
  );
};

export default SkeletonMentorProfile;