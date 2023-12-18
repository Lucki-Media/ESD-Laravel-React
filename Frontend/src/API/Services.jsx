import axios from "axios";

const baseUrl = "https://ergosumdeus.com/api";

const apiService = {
  // Collaborate API CAll
  getCollaborate: async () => {
    try {
      const response = await axios.get(`${baseUrl}/collaborateData`);
      return response.data;
    } catch (error) {
      throw new Error("Failed to fetch getCollaborate");
    }
  },

  // Collaborate API CAll
  getConverge: async () => {
    try {
      const response = await axios.get(`${baseUrl}/convergeData`);
      return response.data;
    } catch (error) {
      throw new Error("Failed to fetch convergeData");
    }
  },

  // cogitateData API CAll
  getCogitate: async () => {
    try {
      const response = await axios.get(`${baseUrl}/cogitateData`);
      return response.data;
    } catch (error) {
      throw new Error("Failed to fetch convergeData");
    }
  },

  // Communicate API CAll
  getCommunicate: async () => {
    try {
      const response = await axios.get(`${baseUrl}/communicateData`);
      return response.data;
    } catch (error) {
      throw new Error("Failed to fetch communicateData");
    }
  },

  // ArchiveData API CAll
  getArchive: async () => {
    try {
      const response = await axios.get(`${baseUrl}/cacheData`);
      return response.data;
    } catch (error) {
      throw new Error("Failed to fetch convergeData");
    }
  },
};

export default apiService;
