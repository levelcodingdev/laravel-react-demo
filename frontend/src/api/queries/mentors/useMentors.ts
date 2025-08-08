import { useQuery } from '@tanstack/react-query';
import type {UseQueryResult} from "@tanstack/react-query"
import type { Mentor } from '../../../types/mentor';
import mentorsApi from '../../mentors';

export const useMentors = (): UseQueryResult<Mentor[]> => {
  return useQuery<Mentor[]>({
    queryKey: ['mentors'],
    queryFn: mentorsApi.getAll,
    staleTime: 1000 * 60 * 5,
  });
};