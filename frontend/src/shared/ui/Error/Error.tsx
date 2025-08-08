import styles from './Error.module.css';

interface ErrorProps {
  message?: string;
}

const Error: React.FC<ErrorProps> = ({
  message = "Something went wrong. Please try again later.",
}) => {
  return (
    <div className={styles.container}>
      <h2 className={styles.title}>Whoops!</h2>
      <p className={styles.message}>{message}</p>
    </div>
  );
};

export default Error;