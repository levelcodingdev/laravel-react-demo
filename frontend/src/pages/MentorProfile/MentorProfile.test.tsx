import { render, screen } from '@testing-library/react';
import MentorProfile from './MentorProfile';
import { useMentor } from '../../api/queries/mentors/useMentor';
import { MemoryRouter } from 'react-router';


vi.mock('../../api/queries/mentors/useMentor');

describe('MentorProfile', () => {
  test('shows skeleton when loading', () => {
    (useMentor as jest.Mock).mockReturnValue({
      data: null,
      isLoading: true,
      error: null,
    });

    render(<MentorProfile />);

    expect(screen.getByTestId('skeleton-avatar')).toBeInTheDocument();
  });

  test('shows error component when error occurs', () => {
    (useMentor as jest.Mock).mockReturnValue({
      data: null,
      isLoading: false,
      error: new Error('Failed to fetch'),
    });

    render(<MemoryRouter>
        <MentorProfile />
    </MemoryRouter>);

    expect(screen.getByText('Whoops!')).toBeInTheDocument();
  });

  test('renders full profile when data is loaded', () => {
    (useMentor as jest.Mock).mockReturnValue({
      data: {
        id: 1,
        fullName: 'Sarah Chen',
        title: 'Senior Frontend Engineer',
        expertise: ['React', 'TypeScript'],
        bio: 'I love mentoring.',
        technicalBio: 'I love mentoring.',
        mentoringStyle: 'I love mentoring.',
        audience: 'I love mentoring.',
        availability: 'open',
      },
      isLoading: false,
      error: null,
    });

    render(<MemoryRouter>
        <MentorProfile />
    </MemoryRouter>);

    expect(screen.getByText('Sarah Chen')).toBeInTheDocument();
    expect(screen.getByText('Senior Frontend Engineer')).toBeInTheDocument();
    expect(screen.getByText('REACT • TYPESCRIPT')).toBeInTheDocument();
    expect(screen.getByText('Apply to Be My Mentee')).toBeInTheDocument();
  });
});