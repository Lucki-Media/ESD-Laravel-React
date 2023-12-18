import React, { useEffect, useState } from "react";
import Navigation from "../components/Navigation/Navigation";
import BlackBanner from "../components/BlackBanner/BlackBanner";
import apiService from "../API/Services";
import Loader from "../components/Loader/Loader";
import Accordion from "react-bootstrap/Accordion";
import { Link } from "react-router-dom";

const Cogitate = () => {
  const [cogitateData, setCogitateData] = useState();
  const [loading, setLoading] = useState(false);

  const fetchCogitateData = async () => {
    try {
      setLoading(true);
      const cogitateApiData = await apiService.getCogitate();
      setCogitateData(cogitateApiData);
      setLoading(false);
    } catch (error) {
      console.error(error);
    }
  };

  useEffect(() => {
    fetchCogitateData();
  }, []);
  return (
    <>
      <div className="detailPage">
        <div className="detailPage__left">
          <Navigation />
        </div>
        <div className="detailPage__right">
         
         
          {loading ? (
            <Loader />
          ) : (
<>
<BlackBanner title={cogitateData && cogitateData.data.heading} />
<div className="detailPage__right-content">
              <h2 className="sectionTitle">01 / think disruptive </h2>
              {
                <div className="accordionCustom">
                  <Accordion defaultActiveKey="0">
                    {cogitateData &&
                      cogitateData?.data?.details[0]?.description.map(
                        (cogitateitem, index) => {
                          // Features secton content from api
                          const serviceLinks = cogitateitem.sub_services.map(
                            (item, index) => {
                              return (
                                <li key={index}>
                                <span style={{ marginRight: '10px'}}> / </span> <Link to="/cogitate">{item}</Link>
                                </li>
                              );
                            }
                          );
                          return (
                            <Accordion.Item eventKey={index} key={index}>
                              <Accordion.Header>
                                {cogitateitem.service_title}
                              </Accordion.Header>
                              <Accordion.Body>
                                <div className="links">
                                  <ul>{serviceLinks}</ul>
                                </div>
                              </Accordion.Body>
                            </Accordion.Item>
                          );
                        }
                      )}
                  </Accordion>
                </div>
              }
            </div>
</>
            
          )}
        </div>
      </div>
    </>
  );
};

export default Cogitate;
