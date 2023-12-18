import React, { useEffect, useState } from "react";
import { NavLink } from "react-router-dom";
import apiService from "../../API/Services";
import "./Navigation.scss";

const Navigation = () => {
  const [archiveData, setArchiveData] = useState();
  const [archiveSingleData, setArchiveSingleData] = useState();
  const [loading, setLoading] = useState(false);
  const [randomWebsite, setRandomWebsite] = useState("");
  const websites = [
    "https://sliding.toys/mystic-square/8-puzzle/daily/",
    "https://paint.toys/",
    "https://longdogechallenge.com/"
  ];
  const fetchArchiveData = async () => {
    try {
      setLoading(true);
      const archiveApiData = await apiService.getArchive();
      setArchiveData(archiveApiData);
      setLoading(false);
    } catch (error) {
      console.error(error);
      setLoading(false);
    }
  };
  useEffect(() => {
    const randomIndex = Math.floor(Math.random() * websites.length);
    setRandomWebsite(websites[randomIndex]);

    fetchArchiveData(archiveData);
  }, []);
  return (
    <>
      <nav className="mainNav">
        <ul>
          <li>
            {" "}
            <NavLink className="nav-link" to={`/`}>
              ERGOSUMDEUS
            </NavLink>
          </li>
          <li>
            {" "}
            <NavLink className="nav-link" to={`/converge`}>
              CONVERGE
            </NavLink>
          </li>
          <li>
            {" "}
            <NavLink className="nav-link" to={`/collaborate`}>
              COLLABORATE
            </NavLink>
          </li>
          <li>
            {" "}
            <NavLink className="nav-link" to={`/cogitate`}>
              COGITATE
            </NavLink>
          </li>
          <li>
            {" "}
            <NavLink className="nav-link" to={`/communicate`}>
              COMMUNICATE
            </NavLink>
          </li>
          <li>
            {" "}
            <NavLink
              className="nav-link Exit_to_website"
              to={randomWebsite}
              target="_blank"
            >
              EXIT
            </NavLink>
          </li>
        </ul>
      </nav>
    </>
  );
};

export default React.memo(Navigation);
