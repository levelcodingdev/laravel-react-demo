import { render, screen } from '@testing-library/react';
import Error from './Error';

describe('ErrorComponent', () => {
  test('renders default error message', () => {
    render(<Error />);

    expect(screen.getByText('Whoops!')).toBeInTheDocument();
    expect(screen.getByText('Something went wrong. Please try again later.')).toBeInTheDocument();
  });

  test('renders custom error message', () => {
    render(<Error message="Custom error occurred" />);

    expect(screen.getByText('Custom error occurred')).toBeInTheDocument();
  });
});