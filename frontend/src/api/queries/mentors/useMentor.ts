import { useQuery } from '@tanstack/react-query';
import type {UseQueryResult} from "@tanstack/react-query"
import type { Mentor } from '../../../types/mentor';
import mentorsApi from '../../mentors';

export const useMentor = (id: number): UseQueryResult<Mentor> => {
  return useQuery<Mentor>({
    queryKey: ['mentor', id],
    queryFn: () => mentorsApi.getById(id),
    enabled: !!id,
    staleTime: 1000 * 60 * 5,
    retry: 1,
  });
};