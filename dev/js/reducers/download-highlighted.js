export default function reducer(state={highlighted:""}, action) {
	switch (action.type) {
		case "DOWNLOAD_HIGHLIGHTED_RECEIVED":
		{
			return {
				...state,
				highlighted: action.payload
			}
		}
		case "DOWNLOAD_HIGHLIGHTED_REJECTED":
		{
			return {
				...state,
				highlighted: action.payload
			}
		}
	}
	return state;
}