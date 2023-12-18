import React, { useEffect, useState } from "react";
import Navigation from "../components/Navigation/Navigation";
import BlackBanner from "../components/BlackBanner/BlackBanner";
import TextComponent from "../components/Text/TextComponent";
import apiService from "../API/Services";
import Loader from "../components/Loader/Loader";

function Communicate() {
  const [communicateData, setCommunicateData] = useState();
  const [loading, setLoading] = useState(false);
  const [isFormSubmitted, setIsFormSubmitted] = useState(false);
  const [errors, setErrors] = useState({});
  const [selectedProject, setSelectedProject] = useState(""); // State to store the selected project

  const [contact, setContact] = useState({
    full_name: "",
    email: "",
    contact_number: "",
    company_name: "",
    project: "",
    message: "",
  });

  const updateInput = (event) => {
    const { name, value } = event.target;
    setContact({
      ...contact,
      [name]: value,
    });
  };

  const validateForm = () => {
    const errors = {};
    // Validate each form field here
    if (contact.full_name.trim() === "") {
      errors.full_name = "Full name is required";
    } else if (contact.full_name.length < 2) {
      errors.full_name = "Full name must be at least 2 characters long";
    } else if (contact.full_name.length > 50) {
      errors.full_name = "Full name cannot exceed 50 characters";
    }
    // Add more validation rules for other fields
    if (contact.email.trim() === "") {
      errors.email = "Email is required";
    } else {
      // Regular expression for a basic email format validation
      const emailRegex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;

      if (!emailRegex.test(contact.email)) {
        errors.email = "Invalid email format";
      }
    }

    if (!selectedProject) {
      // If no project is selected, set a validation error
      errors.project = "Please select a project type";
    }

    if (contact.contact_number.trim() === "") {
      errors.contact_number = "Mobile number is required";
    } else {
      // Regular expression for a basic 10-digit U.S. phone number validation
      const phoneRegex = /^\d{10}$/;

      if (!phoneRegex.test(contact.contact_number)) {
        errors.contact_number =
          "Invalid mobile number format (e.g., 1234567890)";
      }
    }
    return errors;
  };

  const handleSubmit = async (e) => {
    e.preventDefault();

    const dataToSend = {
      ...contact,
      project: selectedProject,
    };
    
    const validationErrors = validateForm();
    if (Object.keys(validationErrors).length > 0) {
      // If there are validation errors, set them in the state
    
      setErrors(validationErrors);
    } else {
      try {
        setLoading(true)
        const response = await fetch(
          "https://ergosumdeus.com/api/sendRequest",
          {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
            },
            body: JSON.stringify(dataToSend),
          }
        );

        if (response.ok) {
          setLoading(false)
          // Request was successful, you can handle the response here
          const responseData = await response.json();
          setIsFormSubmitted(true);
          setLoading(false)
        } else {
          // Handle errors here
          console.error("Error:", response.statusText);
        }
      } catch (error) {
        console.error("Error:", error);
      }
    }
  };

  const fetchCommunicateData = async () => {
    try {
      setLoading(true);
      const communicateApiData = await apiService.getCommunicate();
      setCommunicateData(communicateApiData);
      setLoading(false);
    } catch (error) {
      console.error(error);
    }
  };

  const handleProjectChange = (e) => {
    setSelectedProject(e.target.value); // Update the selected project
  };

  useEffect(() => {
    fetchCommunicateData();
  }, []);
  return (
    <>
      <div className="detailPage">
        <div className="detailPage__left">
          <Navigation />
        </div>
        {loading ? (
          <Loader />
        ) : (
          <div className="detailPage__right">
            <BlackBanner
              title={communicateData && communicateData.data.heading}
            />
            <div className="detailPage__right-content">
              {communicateData &&
                communicateData.data.details.map((topic, index) => {
                  // topic.type === 'content' &&
                  if (topic.type === "content") {
                    return (
                      <div key={topic.id} className="convergeData">
                        <TextComponent
                          title={topic.title}
                          text={topic.description}
                        />
                      </div>
                    );
                  }
                  return null; // Return null for non-partner topics
                })}
              <div className="communivationForm">
                {isFormSubmitted ? (
                  <div className="successMessage">
                    <p>Thank you for your submission!</p>
                  </div>
                ) : (
                  <form onSubmit={(e) => handleSubmit(e)}>
                    <div
                      className={`form-group ${
                        contact.full_name ? "active" : ""
                      }`}
                    >
                      <input
                        type="text"
                        value={contact.full_name}
                        className="form-control"
                        onChange={(e) => updateInput(e)}
                        name="full_name"
                      />
                      <label className="fieldLable">FULL NAME</label>
                      {errors.full_name && (
                        <p className="error">{errors.full_name}</p>
                      )}
                    </div>
                    <div
                      className={`form-group ${contact.email ? "active" : ""}`}
                    >
                      <input
                        type="text"
                        value={contact.email}
                        className="form-control"
                        onChange={(e) => updateInput(e)}
                        name="email"
                      />
                      <label className="fieldLable">EMAIL</label>
                      {errors.email && <p className="error">{errors.email}</p>}
                    </div>
                    <div
                      className={`form-group ${
                        contact.contact_number ? "active" : ""
                      }`}
                    >
                      <input
                        type="text"
                        value={contact.contact_number}
                        className="form-control"
                        onChange={(e) => updateInput(e)}
                        name="contact_number"
                      />
                      <label className="fieldLable">CONTACT NUMBER</label>
                      {errors.contact_number && (
                        <p className="error">{errors.contact_number}</p>
                      )}
                    </div>

                    <div
                      className={`form-group ${
                        contact.company_name ? "active" : ""
                      }`}
                    >
                      <input
                        type="text"
                        value={contact.company_name}
                        className="form-control"
                        onChange={(e) => updateInput(e)}
                        name="company_name"
                      />
                      <label className="fieldLable">COMPANY NAME</label>
                    </div>
                    <div className="form-group">
                      <div className="projectRadio">
                      <label className="projectRadio__title">
                            TYPE OF PROJECT
                          </label>
                          {errors.project && (
                        <p className="error">{errors.project}</p>
                      )}
                        <div className="radioGroup">
                        <div className="radio">
                          
                          <input
                            type="radio"
                            id="project1"
                            name="project"
                            value="1"
                            checked={selectedProject === "1"}
                            onChange={handleProjectChange}
                          />
                          <label className="radio-label" htmlFor="project1">BRAND & COMMS</label>
                        </div>
                        <div className="radio">
                          <input
                            type="radio"
                            id="project2"
                            name="project"
                            value="2"
                            checked={selectedProject === "2"}
                            onChange={handleProjectChange}
                          />
                          <label className="radio-label" htmlFor="project2">WEB & MOBILE </label>
                        </div>
                        <div className="radio">
                          <input
                            type="radio"
                            id="project3"
                            name="project"
                            value="3"
                            checked={selectedProject === "3"}
                            onChange={handleProjectChange}
                          />
                          <label className="radio-label" htmlFor="project3">SPACE & EXPERIENCE</label>
                        </div>
                        <div className="radio">
                          <input
                            type="radio"
                            id="project4"
                            name="project"
                            value="4"
                            checked={selectedProject === "4"}
                            onChange={handleProjectChange}
                          />
                          <label className="radio-label" htmlFor="project4">OTHER</label>
                        </div>
                        </div>
                      </div>
                      
                    </div>
                    <div className="form-group">
                      <div className="textarea">
                      <label>MESSAGE</label>
                      <textarea
                        className="form-control"
                        value={contact.message}
                        onChange={(e) => updateInput(e)}
                        name="message"
                      />
                      </div>
                    </div>
                    <div className="submit">
                    <input type="submit" value={"Good Luck"} />
                    </div>
                  </form>
                )}
              </div>
            </div>
          </div>
        )}
      </div>
    </>
  );
}

export default Communicate;
