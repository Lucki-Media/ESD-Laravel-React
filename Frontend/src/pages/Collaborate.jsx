import React, { useEffect, useState } from "react";
import Navigation from "../components/Navigation/Navigation";
import BlackBanner from "../components/BlackBanner/BlackBanner";
import Accordion from "react-bootstrap/Accordion";
import Carousel from "react-bootstrap/Carousel";
import "../css/carousel.scss";
import TextComponent from "../components/Text/TextComponent";
import apiService from "../API/Services";
import { Link } from "react-router-dom";
import Loader from "../components/Loader/Loader";

const Collaborate = () => {
  const [collabrateData, setCollabrateData] = useState();
  const [loading, setLoading] = useState(false);

  const fetchCollaborateData = async () => {
    try {
      setLoading(true);
      const collabrateApiData = await apiService.getCollaborate();
      setCollabrateData(collabrateApiData);
      setLoading(false);
    } catch (error) {
      console.error(error);
    }
  };

  useEffect(() => {
    fetchCollaborateData();
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
              title={collabrateData && collabrateData.data.heading}
            />

            <div className="detailPage__right-content">
              {collabrateData?.data?.details.map((collabData, index) => {
                return (
                  <div>
                    <h2 className="sectionTitle">{collabData.title}</h2>
                    {collabData.type === "portfolio" ? (
                      <div className="accordionCustom collaborate_customs">
                        <Accordion defaultActiveKey="0">
                          {collabrateData &&
                            collabrateData?.data?.details[0]?.description.map(
                              (carousel, index) => {
                                // carousel images
                                const carousalData = carousel.images.map(
                                  (item, index) => {
                                    return (
                                      <Carousel.Item key={index}>
                                        <img
                                          key={index}
                                          src={item}
                                          alt={carousel.status}
                                        />{" "}
                                      </Carousel.Item>
                                    );
                                  }
                                );

                                // // Features secton content from api
                                const featuresData = carousel.services.map(
                                  (item, index) => {
                                    return (
                                      <li key={index}>
                                       - {item}
                                      </li>
                                    );
                                  }
                                );

                                // // Partners secton content from api
                                const partnersData = carousel.partners.map(
                                  (item, index) => {
                                    return (
                                      <li key={index}>  -  {item.partner_title}                                      
                                      </li>
                                    );
                                  }
                                );

                                return (
                                  <Accordion.Item eventKey={index} key={index}>
                                    <Accordion.Header>
                                      {carousel.portfolio_title}
                                    </Accordion.Header>
                                    <Accordion.Body>
                                      <Carousel>{carousalData}</Carousel>
                                      <div className="carousel_Data_links">
                                      <div className="links links--styled m_left">
                                        <ul>{featuresData}</ul>
                                      </div>
                                      <div className="links links--styled">
                                        <ul>{partnersData}</ul>
                                      </div>

                                      </div>
                                     
                                      <TextComponent
                                        key={index}
                                        text={carousel.content}
                                      />
                                    </Accordion.Body>
                                  </Accordion.Item>
                                );
                              }
                            )}
                        </Accordion>
                      </div>
                    ) : null}
                    {collabData.type === "content" ? (
                      <div key={collabData.id} className="convergeData">
                        <TextComponent text={collabData.description} />
                      </div>
                    ) : null}
                    {collabData.type === "archive" ? (
                      <div className="cacheSection">
                        <Link target="_blank" to={"/archive"}>
                          project archive
                        </Link>
                      </div>
                    ) : null}
                  </div>
                );
              })}
            </div>
          </div>
          )}
        </div>
      
    </>
  );
};

export default Collaborate;
