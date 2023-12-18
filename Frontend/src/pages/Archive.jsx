import React, { useEffect, useState } from "react";
import apiService from "../API/Services";
import Loader from "../components/Loader/Loader";
import Accordion from "react-bootstrap/Accordion";
import Carousel from "react-bootstrap/Carousel";
import "../css/carousel.scss";
import TextComponent from "../components/Text/TextComponent";
import { Link } from "react-router-dom";
import BlackBanner from "../components/BlackBanner/BlackBanner";
import { NavLink } from "react-router-dom";


const Converge = () => {
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
  const archiveClick = (itemId) => {
    const newArchiveData = archiveData.data.details[itemId];
    console.log(newArchiveData);
    setArchiveSingleData(newArchiveData);
  };

  // Get Features Data
  const featuresData =
    archiveSingleData &&
    archiveSingleData.services.map((item, index) => {
      return (
        <li key={index}>
          <Link to={"/"}>{item}</Link>
        </li>
      );
    });

  // Get Carousel Data
  const carousalData =
    archiveSingleData &&
    archiveSingleData.images.map((item, index) => {
      return (
        <Carousel.Item key={index}>
          <img key={index} src={item} />
        </Carousel.Item>
      );
    });

  return (
    <>
      {loading ? (
        <Loader />
      ) : (
        <div className="archivePage">
          <div className="archivePageHeader">
            <div className="archivePageHeader__left">
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
                    <NavLink className="nav-link Exit_to_website" to={randomWebsite} target="_blank">
                      EXIT
                    </NavLink>
                  </li>
                </ul>
              </nav>
            </div>
            <div className="archivePageHeader__right">
              <BlackBanner title={archiveData && archiveData.data.heading} />
            </div>
          </div>
          <div className="archiveList">
            <div className="links linksThreeColumn">
                <ul>
                  {archiveData &&
                    archiveData.data.details.map((item, index) => {
                      return (
                        <li key={index} onClick={() => archiveClick(index)} >
                        <span className={item.show_details === '2' ? 'private_link' : ''}> {item.portfolio_title}</span>
                        </li>
                      );
                    })}
                </ul>
            </div>
          </div>
          <div className="archiveListData">
            <div className="accordionCustom cgff">
              {archiveSingleData ? (
                console.log("hey"),
                <Accordion defaultActiveKey="0">
                  <Accordion.Item eventKey="0">
                    <Accordion.Header>
                      {archiveSingleData && archiveSingleData.portfolio_title}
                    </Accordion.Header>
                    <Accordion.Body>
                      <div className="twoColumn">
                        <div className="twoColumn__left">
                          <TextComponent
                            key={"index"}
                            text={
                              archiveSingleData && archiveSingleData.content
                            }
                          />
                          {featuresData && featuresData.length > 0 ? (
                            <div className="links links--styled">
                              <ul>{featuresData}</ul>
                            </div>
                          ) : (
                            ""
                          )}
                        </div>
                        <div className="twoColumn__right">
                          {carousalData && carousalData.length > 0 ? (
                            <Carousel>{carousalData}</Carousel>
                          ) : (
                            <h2 className="text-center">No Data to Display</h2>
                          )}
                        </div>
                      </div>
                    </Accordion.Body>
                  </Accordion.Item>
                </Accordion>
              ) : (
                console.log("bye"),

                ""
              )}
            </div>
          </div>
        </div>
      )}
    </>
  );
};

export default Converge;
