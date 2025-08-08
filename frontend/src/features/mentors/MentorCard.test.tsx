import { render, screen } from '@testing-library/react';
import MentorCard from './MentorCard';
import type { Mentor } from '../../types/mentor';
import { MemoryRouter } from 'react-router';

const mockMentor: Mentor = {
  id: 1,
  fullName: 'Sarah Chen',
  email: 'sarah@example.com',
  title: 'Senior Frontend Engineer',
  bio: 'Passionate about React and mentoring.',
  technicalBio: 'Passionate about React and mentoring.',
  mentoringStyle: 'Passionate about React and mentoring.',
  audience: 'Passionate about React and mentoring.',
  avatar: 'https://example.com/avatar.jpg',
  expertise: ['react', 'typescript'],
  availability: 'open',
  joined_at: 'Jun 2020',
};

describe('MentorCard', () => {
  test('renders mentor data correctly', () => {
    render(
         <MemoryRouter>
            <MentorCard {...mockMentor} />``
        </MemoryRouter>
    );

    expect(screen.getByText('Sarah Chen')).toBeInTheDocument();
    expect(screen.getByText('Senior Frontend Engineer')).toBeInTheDocument();
    expect(screen.getByText('REACT • TYPESCRIPT')).toBeInTheDocument();

    const img = screen.getByAltText('Sarah Chen');
    expect(img).toBeInTheDocument();
    expect(img).toHaveAttribute('src', mockMentor.avatar);
  });
});