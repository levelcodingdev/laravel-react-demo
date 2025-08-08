export type Mentor = {
  id: number;
  fullName: string;
  email: string | null;
  title: string;
  bio: string | null;
  technicalBio: string | null;
  mentoringStyle: string | null;
  audience: string | null;
  avatar: string | null;
  expertise: string[];
  availability: 'open' | 'limited' | 'full' | 'paused';
  joined_at: string;
};