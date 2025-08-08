import apiClient from "../lib/apiClient";
import type { Mentor } from "../types/mentor";

type MentorResponse = {
  data: Mentor;
};

type MentorsResponse = {
  data: Mentor[];
};

const mentorsApi = {
  getAll: async (): Promise<Mentor[]> => {
    const { data } = await apiClient.get<MentorsResponse>('/v1/mentors');
    return data.data;
  },

  getById: async (id: number): Promise<Mentor> => {
    const { data } = await apiClient.get<MentorResponse>(`/v1/mentors/${id}`);
    return data.data;
  }
};

export default mentorsApi;