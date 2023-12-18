import React, { useEffect, useState } from "react";
import Navigation from "../components/Navigation/Navigation";
import BlackBanner from "../components/BlackBanner/BlackBanner";
import { Link } from "react-router-dom";
import TextComponent from "../components/Text/TextComponent";
import apiService from "../API/Services";
import Loader from "../components/Loader/Loader";

const Converge = () => {
  const [convergeData, setConvergeData] = useState();
  const [loading, setLoading] = useState(false);

  const fetchConvergeData = async () => {
    try {
      setLoading(true);
      const convergeApiData = await apiService.getConverge();
      setConvergeData(convergeApiData);
      setLoading(false);
    } catch (error) {
      console.error(error);
    }
  };

  useEffect(() => {
    fetchConvergeData();
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
            <BlackBanner title={convergeData && convergeData.data.heading} />

            <div className="detailPage__right-content">
              {convergeData &&
                convergeData.data.details.map((topic, index) => {
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

              <div className={`links`}>
                <ul>
                  {convergeData &&
                    convergeData.data.details.map((topic) => {
                      if (topic.type === "partner") {
                        return topic.description.map((partner_data) => (
                          <li>
                            <Link target="_blank" to={partner_data.link}>
                              {partner_data.partner}
                            </Link>
                          </li>
                        ));
                      }
                      return null; // Return null for non-partner topics
                    })}
                </ul>
              </div>
            </div>
          </div>
          )}
        </div>
      
    </>
  );
};

export default Converge;
