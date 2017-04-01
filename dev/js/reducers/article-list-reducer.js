//import articleData from "../data/articleData";

export default function reducer(state={articles:[]}, action) {
	switch (action.type) {
		case "FETCH_ARTICLES":
		{
			return {...state, articles: action.payload};
		}
	}
	return state;
}
