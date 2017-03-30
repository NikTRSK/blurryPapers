export const searchButtonClicked = (query) => {
  console.log("TODO: THIS SHOULD CALL THE DB: ", query);
  return {
    type: 'SEARCH_QUERY',
    payload: query
  }
};
